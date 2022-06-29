<?php

class RemainderCard {
    function get($rid, $title, $daysLeft, $amount) {
        echo <<<HTML
            <div class="card mb-4 remainder">
                <div class="card-body d-flex justify-content-between align-items-center px-2 py-2 bg-warning bg-gradient remainder-data-holder">
                    <div class="left-side">
                    <input type="hidden" class="rid" value=$rid>

                        <h5 class="data">$title</h5>
                        <p class="m-0"> <span class="data">
                        $daysLeft
                        </span>  days left</p>
                    </div>

                    <div class="right-side ">
                        <p class="data">Rs $amount</p>

                        <div class="d-flex justify-content-end">

                            <span class="material-icons editRemainderBtn" >edit</span>
                            
                            <a href="utils/delete_remainder.php?rid=$rid">
                                <span class="material-icons delete-logo">delete</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        HTML;
    }
}
