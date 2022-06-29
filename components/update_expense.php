<!-- Modal -->
<div class="modal fade" id="updateExpenseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">

                    <!-- Updating data from here -->
                    <input type="hidden" id="eid" name="eid">

                    <input type="text" class="form-control expName" placeholder="Expense name" name="expenseName">

                    <input type="number" class="form-control mt-2 expAmount" placeholder="Amount" name="expenseAmount" autocomplete="off">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Update" name="update-exp" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("database/Expense.class.php");
if (isset($_POST["update-exp"])) {

    $expId = $_POST["eid"];
    $expName = $_POST["expenseName"];
    $expAmount = $_POST["expenseAmount"];
    $uid = $_SESSION['uid'];

    if ($empName !== "" && $expAmount !== "") {
        $expense = new Expense($uid);
        $expense->update($expId, $expName, $expAmount);
    }

    header("Location: index.php");
}
?>