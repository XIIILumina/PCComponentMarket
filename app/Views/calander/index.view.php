<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";

// Get the current month and year
$year = date('Y');
$month = date('m');

// Get the first day of the current month
$firstDayOfMonth = date('N', strtotime("$year-$month-01"));

// Get the number of days in the current month
$daysInMonth = date('t', strtotime("$year-$month-01"));

// Calculate the number of days from the previous month
$daysFromPrevMonth = $firstDayOfMonth - 1;

// Calculate the total number of cells in the calendar grid
$totalCells = $daysInMonth + $daysFromPrevMonth;

// Calculate the number of days from the next month to fill the grid
$daysFromNextMonth = 7 - ($totalCells % 7);

// Initialize the current day of the month
$currentDayOfMonth = 1;

// Initialize the day count
$dayCount = 1;

// Start the calendar grid
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
            <div class="text-center py-2 h-auto font-bold text-gray-500  "><?= $day ?></div>
        <?php endforeach; ?>    

        <!-- Days from Previous Month -->
        <?php 
        for ($i = $daysFromPrevMonth; $i > 0; $i--) : ?>
            <div class="text-left border border-gray-200 bg-gray-200 py-6 px-1 rounded-sm shadow-md hover:scale-105 transition-transform">
                <span class="text-gray-400"><?= date('j', strtotime("-$i days", strtotime("$year-$month-01"))) ?></span>
            </div>
        <?php endfor; ?>

        <!-- Calendar Days -->
        <?php 
        while ($dayCount <= $daysInMonth) : ?>
            <?php 
            $currentDate = date('Y-m-d', strtotime("$year-$month-$currentDayOfMonth"));
            $tasksForDay = $calendar[$currentDate] ?? []; 
            ?>
            <div class="text-left border border-gray-200 bg-gray-200 py-6 px-1 rounded-sm shadow-md hover:scale-105 transition-transform">
                <span><?= $currentDayOfMonth ?></span>
                <?php foreach ($tasksForDay as $task) : ?>
                    <div class="bg-gray-400 border border-gray-300 rounded-md text-white px-0.5 py-0.5 shadow-xl">
                        <p><?= $task['Title'] . ' - Status:' . $task['Status'] ?></p>
                        <p>Lidz: <?= $task['Deadline'] ?></p>
                        <button class="bg-purple-300 text-black rounded-md p-1 px-2 hover:scale-105 transition-transform" action="../task/edit">View</button>
                        <button class="bg-purple-300 text-black rounded-md p-1 px-2 hover:scale-105 transition-transform" action="../task/edit">Done</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $currentDayOfMonth++; $dayCount++; ?>
        <?php endwhile; ?>

        <!-- Days from Next Month -->
        <?php 
        for ($i = 1; $i <= $daysFromNextMonth; $i++) : ?>
            <div class="text-left border border-gray-200 bg-gray-200 py-6 px-1 rounded-sm shadow-md hover:scale-105 transition-transform">
                <span class="text-gray-500"><?= $i ?></span>
            </div>
        <?php endfor; ?>
    </div>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
