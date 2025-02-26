<?php
namespace Adminz\Helper;
class Wpadminlogin {

	function __construct() {

	}

    function init_quiz(){
		// Hiển thị quiz trên màn hình login
		add_action( 'login_form', function () {
			// Tạo hai số ngẫu nhiên từ 1 đến 9
			$num1      = rand( 1, 9 );
			$num2      = rand( 1, 9 );
			$operators = [ '+', '-', '*' ]; // Các phép toán
			$operator  = $operators[ array_rand( $operators ) ]; // Chọn ngẫu nhiên một phép toán

			// Tính toán kết quả đúng
			$result = 0;
			switch ( $operator ) {
				case '+':
					$result = $num1 + $num2;
					break;
				case '-':
					$result = $num1 - $num2;
					break;
				case '*':
					$result = $num1 * $num2;
					break;
			}

			// Lưu kết quả đúng vào session
			if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
			$_SESSION['adminz_quiz_result'] = $result;
			// Hiển thị câu hỏi
            echo <<<HTML
            <style type="text/css">
                #adminz_quiz_login{
                    display: flex;
                    align-items: center;
                    padding: 10px;
                    border: .0625rem solid #8c8f94;
                    margin-bottom: 15px;
                    border-radius: 5px;
                    color: #1b1e21;
                    background-color: #d6d8d978;
                }
                #adminz_quiz_login strong{
                    width: 100%; 
                    font-size:1.3em;
                    color: inherit;
                    text-align: center;
                }
                #adminz_quiz_login input{
                    margin-bottom: 0px;
                    text-align: center;
                }
            </style>
            <div id="adminz_quiz_login">
                <strong>{$num1} {$operator} {$num2} = ?</strong>
                <input type="text" name="quiz_answer" placeholder="" required>
            </div>
            HTML;
		} );

		// Xác thực quiz trước khi đăng nhập
		add_filter( 'authenticate', function ($user, $username, $password) {
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

				// Kiểm tra nếu quiz đã được trả lời
				if ( !isset( $_POST['quiz_answer'] ) || !isset( $_SESSION['adminz_quiz_result'] ) ) {
					return new \WP_Error( 'quiz_error', __('You need to answer the question before logging in.', 'administrator-z') );
				}

				// Kiểm tra câu trả lời
				$quiz_answer = intval( $_POST['quiz_answer'] );
				$quiz_result = $_SESSION['adminz_quiz_result'];

				// Nếu sai, trả về lỗi
				if ( $quiz_answer !== $quiz_result ) {
					return new \WP_Error( 'quiz_error', __('The answer is incorrect. Please try again.', 'administrator-z') );
				}

				// Nếu đúng, xóa session và tiếp tục đăng nhập
				unset( $_SESSION['adminz_quiz_result'] );
			}

			return $user;
		}, 30, 3 );
    }

}