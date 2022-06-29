<!-- Modal -->
<div class="modal fade" id="remainderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="remainderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remainderModalLabel">Add Remainder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">

                    <!-- Getting data from here -->
                    <input type="text" class="form-control" placeholder="Remainder name" name="remName" required>

                    <input type="number" class="form-control mt-2" placeholder="Amount" name="remAmount" autocomplete="off" required>

                    <label class="text-secondary">
                        Paying Date:
                        <input type="date" name="payingDate" class="mt-2 text-secondary rounded-3" required>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark shadow-none border-2" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Add" name="add-rem">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once("database/Remainder.class.php");

if (isset($_POST["add-rem"])) {

    $remName = $_POST["remName"];
    $remAmount = $_POST["remAmount"];
    $uid = $_SESSION['uid'];

    $payingDate = $_POST["payingDate"];

    if ($remName !== "" && $remAmount !== "" && $payingDate !== "") {
        $rem = new Remainder($uid);
        $rem->add($remName, $remAmount, $payingDate);
    }
    header("Location: index.php");
}
?>