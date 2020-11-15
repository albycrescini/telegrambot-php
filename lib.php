<?php
function sendMessage ($chatID, $text) {
	$token = '###';
	$path = "https://api.telegram.org/bot$token";
	file_get_contents($path."/sendmessage?chat_id=".$chatID."&text=".$text."&parse_mode=HTML&disable_web_page_preview=1");
}

/* IMPORTANT: In order to use the following function you need to import the 'bot_message' table in your SQL Server in order to have access to previous messages.
You also need to un-comment in your index.php file the SQL queries row, so that messages will be saved in the database. */
function getPreviousMessage ($SQLconnection, $chatID, $offset) {
    $sql = "SELECT message FROM bot_messages WHERE chatID = ".$chatID." ORDER BY ID DESC LIMIT $offset";
    $result = $SQLconnection->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $save = ($row["message"]); // Since it is 2 elements long, save will be the last but one value
        }
    }
    return $save;
}

function hyperlink ($text, $link) {
    $link = str_replace("&", "%26", $link);
    $out = "[".$text."](".$link.")";
    return $out;
}

# Keyboard
function inlineKeyboard ($butons) {
	$keyboard = array(
		"inline_keyboard" => array($buttons)
	);
	$keyboard = json_encode($keyboard);
	$keyboard = "&reply_markup=".$keyboard;
	return $keyboard;
}

function keyboard ($buttons) {
	$keyboard = array(
		"keyboard" => $buttons,
		# OPTIONS #
		'resize_keyboard' => true, 
		'one_time_keyboard' => true,
		'remove_keyboard' => true
	);
	$keyboard = json_encode($keyboard);
	$keyboard = "&reply_markup=".$keyboard;
	return $keyboard;
}

function removeKeyboard () {
	$removeKeyboard = array('remove_keyboard' => true);
	$removeKeyboardEncoded = json_encode($removeKeyboard);
	return '&reply_markup='.$removeKeyboardEncoded;
}

# Callback
function callbackUpdate ($up) {
	return $up["callback_query"];
}
?>
