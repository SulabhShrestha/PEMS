<!-- Modal -->
<div class="modal fade" id="updateRemainderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Remainder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">

                    <!-- Updating data from here -->

                    <input type="hidden" id="rid" name="rid">

                    <input type="text" class="form-control remName" placeholder="Remainder name" name="remName" required>

                    <input type="number" class="form-control mt-2 remAmount" placeholder="Amount" name="remAmount" autocomplete="off" required>

                    <label class="text-secondary">
                        Paying Date:
                        <input type="date" name="payingDate" class="mt-2 text-secondary rounded-3 payingDate" required>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Update" name="update-rem">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("database/Remainder.class.php");
if (isset($_POST["update-rem"])) {

    $rid = $_POST["rid"];
    $remName = $_POST["remName"];
    $remAmount = $_POST["remAmount"];
    $uid = $_SESSION['uid'];
    $payingDate = $_POST["payingDate"];

    if ($remName !== "" && $remAmount !== "" && $payingDate !== "") {
        $rem = new Remainder($uid);
        $rem->update($rid, $remName, $remAmount, $payingDate);
    }
    header("Location: index.php");
}
?>