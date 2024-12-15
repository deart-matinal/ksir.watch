<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate"> 
    <meta http-equiv="pragma" content="no-cache"> 
    <meta http-equiv="expires" content="0"> 
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="author" content="deart-夕&幕伞科技">
    <title>留言板</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #d6eaff;
            margin: 0;
            padding: 0;
        }

        .message-board {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #4a4a4a;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .message-form {
            margin-bottom: 40px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .message-form label {
            font-weight: bold;
            color: #555;
        }

        .message-form input, .message-form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .message-form button {
            background: #4a90e2;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .message-form button:hover {
            background: #357ab7;
        }

        .message-note {
            background: #f8e6a3;
            padding: 15px;
            margin: 15px;
            border-radius: 10px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            display: inline-block;
            width: 200px;
            height: auto;
        }

        .message-note strong {
            color: #333;
            font-size: 18px;
            margin-bottom: 5px;
            display: block;
        }

        .message-time {
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .message-note p {
            font-size: 16px;
            color: #444;
            margin-bottom: 10px;
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .message-board {
                padding: 20px;
            }

            h1 {
                font-size: 28px;
            }

            .message-form input, .message-form textarea {
                font-size: 14px;
            }

            .message-form button {
                padding: 12px 25px;
            }

            .message-note {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="message-board">
        <h1>痕迹</h1>
        
        <div class="message-form">
            <form action="save_message.php" method="post">
                <p>
                    <label for="name">昵称(最多6字):</label><br>
                    <input type="text" id="name" name="name" maxlength="6" required>
                </p>
                <p>
                    <label for="message">留言内容 (最多10字):</label><br>
                    <textarea id="message" name="message" maxlength="10" required></textarea>
                </p>
                <button type="submit">提交留言</button>
            </form>
        </div>

        <div id="messages">
            <?php
            $messages = file_exists("messages.txt") ? file("messages.txt") : [];
            $messages = array_reverse($messages); // 反转留言顺序
            $is_master = isset($_GET['master']); // 判断是否有 master 参数
            
            foreach($messages as $index => $message) {
                $data = json_decode($message, true);
                echo '<div class="message-note">';
                echo '<strong>' . htmlspecialchars($data['name']) . '</strong>';
                echo '<div class="message-time">' . $data['time'] . '</div>';
                echo '<p>' . nl2br(htmlspecialchars($data['message'])) . '</p>';
                
                if ($is_master) {
                    // 如果是 master，显示删除按钮
                    echo '<form action="delete_message.php" method="post" style="display:inline-block;">';
                    echo '<input type="hidden" name="index" value="' . $index . '">';
                    echo '<button type="submit" style="background:red;color:white;border:none;padding:5px;">删除</button>';
                    echo '</form>';
                }
                
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
