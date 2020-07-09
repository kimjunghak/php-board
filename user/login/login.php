<?php
include $_SERVER['DOCUMENT_ROOT'] . "/header/html_header.php";
?>
<div id="login_form">
    <span>로그인</span>

    <div id="login_area">
        <form method="get" action="login_ok.php">
            <div>
                <label>ID</label><input type="text" name="id" id="uid" required>
            </div>
            <div>
               <label>PW</label><input type="password" name="pw" id="upw" required>
            </div>
            <button type="submit">로그인</button>
            <a href="/"><input type="button" value="취소"></a>
        </form>

    </div>
</div>
</body>