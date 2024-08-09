document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk memperbarui status tugas
    function updateTaskStatus(itemId, newStatus) {
        fetch(`${site_url}kanban/update_task_status`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ task_id: itemId, status: newStatus, project_id })
        });
    }

    // Inisialisasi Sortable untuk kolom Kanban
    document.querySelectorAll('.kanban-column').forEach(column => {
        new Sortable(column, {
            group: 'kanban',
            animation: 150,
            onEnd: evt => updateTaskStatus(evt.item.dataset.id, evt.to.id)
        });
    });

    // Fungsi untuk mengatur mode (light/dark)
    const body = document.getElementById('body');
    const modeSwitcher = document.getElementById('modeSwitcher');

    function setMode(mode) {
        const isDark = mode === 'dark';
        body.classList.toggle('bg-dark', isDark);
        body.classList.toggle('dark-mode', isDark);
        body.classList.toggle('bg-light', !isDark);
        modeSwitcher.textContent = `Switch to ${isDark ? 'Light' : 'Dark'} Mode`;
        localStorage.setItem('mode', mode);
    }

    // Muat preferensi mode dari localStorage
    setMode(localStorage.getItem('mode') || 'dark');

    // Event listener untuk switcher mode
    modeSwitcher.addEventListener('click', () => setMode(body.classList.contains('bg-light') ? 'dark' : 'light'));

    // Toggle form
    const toggleFormSwitch = document.getElementById('toggleFormSwitch');
    const formContainer = document.getElementById('formContainer');
    const toggleIcon = document.getElementById('toggleIcon');

    toggleFormSwitch.addEventListener('change', function() {
        const isChecked = this.checked;
        formContainer.classList.toggle('collapsed', !isChecked);
        toggleIcon.setAttribute('data-icon', isChecked ? 'minus' : 'plus');
        toggleIcon.className = isChecked ? 'fa-minus text-danger' : 'fa-plus text-success';
    });

    // Inisialisasi Select2
    $('.select2-ajax').select2({
        ajax: {
            url: `${site_url}/kanban/search_users`,
            dataType: 'json',
            delay: 250,
            data: params => ({ q: params.term }),
            processResults: data => ({ results: data }),
            cache: true,
            error: (jqXHR, textStatus, errorThrown) => console.error('AJAX error:', textStatus, errorThrown)
        },
        minimumInputLength: 1,
        placeholder: 'Pilih Anggota',
        allowClear: true
    });
});