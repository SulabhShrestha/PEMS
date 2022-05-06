<?php


function getCard($name)
{
    return <<<HTML
            <div class="card w-50">
                <div class="card-body">
                    <h5 class="card-title">$name</h5>
                </div>
            </div>
        HTML;
}
