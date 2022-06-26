<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">

                    <!-- Getting data from here -->

                    <input type="text" class="form-control" placeholder="Expense name" name="expenseName">

                    <input type="number" class="form-control mt-2" placeholder="Amount" name="expenseAmount" autocomplete="off">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark shadow-none border-2" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Add" name="add-exp" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("database/Expense.class.php");
if (isset($_POST["add-exp"])) {

    $expName = $_POST["expenseName"];
    $expAmount = $_POST["expenseAmount"];
    $uid = $_SESSION['uid'];

    if ($empName !== "" && $expAmount !== "") {
        $expense = new Expense($uid);
        $expense->add($expName, $expAmount);
    }

    header("Location: index.php");
}
?>