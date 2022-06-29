<!-- Modal -->
<div class="modal fade" id="limitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="limitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="limitModalLabel">Add Your Daily Limit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">

                    <!-- Getting data from here -->
                    <input type="number" class="form-control mt-2" placeholder="Enter your daily limit:" name="limitAmount" autocomplete="off" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark shadow-none border-2" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Add" name="add-limit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once("database/ExpenseLimit.class.php");

if (isset($_POST["add-limit"])) {

    $limitAmount = $_POST["limitAmount"];
    $uid = $_SESSION['uid'];

    if ($limitAmount !== "") {
        $rem = new ExpenseLimit($uid);
        $rem->add($limitAmount);
    }
    header("Location: index.php");
}
?>