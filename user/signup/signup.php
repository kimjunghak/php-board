<?php
include $_SERVER['DOCUMENT_ROOT'] . "/header/html_header.php";
?>
    <div id="signup_form">
        <span>회원가입</span>

        <div id="signup_area">
            <form method="get" action="signup_ok.php">
                <div>
                    <label>ID</label><input type="text" name="id" id="uid" required>
                </div>
                <div>
                    <label>PW</label><input type="password" name="pw" id="upw" required>
                </div>
                <div>
                    <label>이름</label><input type="text" name="name" id="uname" required>
                </div>
                <button type="submit">회원가입</button>
                <a href="/"><input type="button" value="취소"></a>
            </form>
        </div>
    </div>
</body>