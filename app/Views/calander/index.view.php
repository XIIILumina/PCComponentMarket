<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";
?>
<div class="h-screen flex items-center justify-center rounded-xl">
    <div class="grid grid-cols-7 gap-0.5 shadow-xl">
        <!-- Month Header -->
        <div class="col-span-7 text-center m-2">
            <h1 class="text-2xl font-bold"><?= date('F Y') ?></h1>
        </div>

        <!-- Weekday Labels -->
        <?php 
        $weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($weekdays as $day) : ?>
            <div class="text-center p-8 h-auto font-bold"><?= $day ?></div>
        <?php endforeach; ?>

        <!-- Calendar Days -->
        <?php 
        $daysInMonth = date('t');
        $firstDayOfMonth = date('N', strtotime(date('Y-m-01')));
        $currentDayOfMonth = 1;
        $dayCount = 1;

        // Fill in the empty cells before the first day of the month
        for ($i = 1; $i < $firstDayOfMonth; $i++) : ?>
            <div class="border border-gray-200 p-8"></div>
        <?php endfor;

        // Fill in the days of the month
        while ($dayCount <= $daysInMonth) : ?>
            <?php 
            $currentDate = date('Y-m-d', strtotime(date('Y-m') . '-' . $currentDayOfMonth));
            $tasksForDay = $calendar[$currentDate] ?? []; 
            ?>
            <div class="text-left border border-gray-200 p-4">
                <span><?= $currentDayOfMonth ?></span>
                <?php foreach ($tasksForDay as $task) : ?>
                    <p><?= $task['Title'] . ' - ' . $task['Status'] ?></p>
                    <p>Deadline: <?= $task['Deadline'] ?></p>
                <?php endforeach; ?>
            </div>
            <?php $currentDayOfMonth++; $dayCount++; ?>
        <?php endwhile; ?>
    </div>
</div>
<?php require_once "../app/Views/Components/footer.php"; ?>
