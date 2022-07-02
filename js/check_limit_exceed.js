/***
 * Checks if the user daily limit has exceeded or not
 */

$(document).ready(function () {
  let remAmount = $(".limit-left .remaining-amount").text().trim();

  if (remAmount < 0) {
    new AlertCollection().dailyLimitExceeded();
  }
});
