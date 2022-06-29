<?php

/**
 * This returns a expense items in card
 */
class ExpenseCard {

    function get($eid, $name, $amt) {

        echo <<<HTML
            <div class="card mb-4 bg-info bg-gradient">
                <div class="card-body d-flex justify-content-between expense-data-holder">
                    <div class="left-side d-flex align-items-center">

                        <input type="hidden" class="eid" value=$eid>

                        <span class="material-icons">paid</span>
                        <span class="title px-2 data">$name</span>
                    </div>

                    <div class="right-side d-flex align-items-center">
                        <span class="amount data">Rs $amt</span>
                        
                        
                        <span class="material-icons px-2 editExpenseBtn" >edit</span>
                        

                        <a href="utils/delete_expense.php?eid=$eid">
                            <span class="material-icons delete-logo">delete</span>
                        </a>
                    </div>
                </div>
            </div>
        HTML;
    }
}
