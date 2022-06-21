<?php

/**
 * This returns a expense items in card
 */
class ExpenseCard {

    function get($name, $amt) {

        echo <<<HTML
            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between">
                    <div class="left-side d-flex align-items-center">

                        <span class="material-icons">paid</span>
                        <span class="title px-2">$name</span>
                    </div>

                    <div class="right-side d-flex align-items-center">
                        <span class="amount">Rs $amt</span>
                        <span class="material-icons px-2">edit</span>
                        <span class="material-icons">delete</span>
                    </div>
                </div>
            </div>
        HTML;
    }
}
