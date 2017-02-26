<?php
require_once ('../app.php');
$request = $dataConnect->getById($requestId, 'requests');
?>

<div class="page-title">
    <p class="page-title-text">申請の削除</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3>本当に削除しますか？</h3>
                <form method="POST" action="/requests/exec.php/<?php echo $requestId ?>">
                    <div class="form-group">
                        <input class="form-control" name="exectype" type="hidden" value="deleteRequest">
                    </div>
                    <button class="btn btn-danger" type="submit">削除</button>
                    <a href="/users/show.php/<?php echo $userId ?>" class="btn" style="background-color: silver; color: black">いいえ</a>
                </form>

            </div>
        </div>
    </div>
</div>