<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">&copy; <?= date('Y'); ?> Kanban Board. All Rights Reserved.</p>
        <p class="mb-0">Created by <a href="https://koys.my.id" class="text-white">Koys</a></p>
        <div class="mt-2">
            <a href="https://github.com/bzndenis" class="text-white"><i class="fab fa-github"></i></a>
            <a href="https://instagram.com/dens.akbar" class="text-white"><i class="fab fa-instagram"></i></a>
            <a href="https://koys.my.id" class="text-white"><i class="fas fa-globe"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"
    integrity="sha512-TelkP3PCMJv+viMWynjKcvLsQzx6dJHvIGhfqzFtZKgAjKM1YPqcwzzDEoTc/BHjf43PcPzTQOjuTr4YdE8lNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const site_url = '<?= base_url(); ?>';
    const project_id = '<?= isset($project_id) ? $project_id : ''; ?>';
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
    integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>