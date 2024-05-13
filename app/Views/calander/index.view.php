<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";
?>
<div class="h-screen flex items-center text=lg justify-center rounded-xl">
    <div class="grid grid-cols-7 gap-1 shadow-xl font-normal text-black  py-2 px-4">
        <!-- Month Header -->
        <div class="col-span-7 text-center m-2 text-black">
            <h1 class="text-2xl font-bold"><?= date('F Y') ?></h1>
        </div>

        <!-- Weekday Labels -->
        <?php 
        $weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($weekdays as $day) : ?>
            <div class="text-center py-2 h-auto font-bold text-gray-300  "><?= $day ?></div>
        <?php endforeach; ?>    

        <!-- Calendar Days -->
        <?php 
        $daysInMonth = date('t');
        $firstDayOfMonth = date('N', strtotime(date('Y-m-01')));
        $currentDayOfMonth = 1;
        $dayCount = 1;

        // Fill in the empty cells before the first day of the month
        for ($i = 1; $i < $firstDayOfMonth; $i++) : ?>
            <div class="text-topleft text-gray-500 border border-gray-200 bg-gray-200 shadow-md px-1 rounded-smp-2"></div>
        <?php endfor;

        // Fill in the days of the month
        while ($dayCount <= $daysInMonth) : ?>
            <?php 
            $currentDate = date('Y-m-d', strtotime(date('Y-m') . '-' . $currentDayOfMonth));
            $tasksForDay = $calendar[$currentDate] ?? []; 
            ?>
            <div class="text-left border border-gray-200 bg-gray-200 py-6 px-1 rounded-sm shadow-md">
                <span><?= $currentDayOfMonth ?></span>
                <?php foreach ($tasksForDay as $task) : ?>
                    <div class="bg-gray-400 border border-gray-400 rounded-md text-white px-0.5 py-0.5 shadow-xl">
                        <p><?= $task['Title'] . ' - Status:' . $task['Status'] ?></p>
                        <p>Lidz: <?= $task['Deadline'] ?></p>
                        <button class="bg-gray-300 text-black rounded-xl p-1 px-2 hover:" action="/task/edit"> View</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $currentDayOfMonth++; $dayCount++; ?>
        <?php endwhile; ?>
    </div>
</div>
<?php require_once "../app/Views/Components/footer.php"; ?>
