/**
 *
 * If today user has to pay any liabilities, dialog box will appear
 *
 */

// temp

// Deconstructing remainder card
let remainderCardObjects = $(".remainder-card").map(function (i, elem) {
  let dayLeft = $(elem).find(".daysLeft").text().trim();

  let title = $(elem).find(".title").text();

  return { dayLeft, title };
});

for (let remainderObj of remainderCardObjects) {
  if (remainderObj.dayLeft < 1) {
    new AlertCollection().timeToPay(remainderObj.title);
    console.log(remainderObj.title);
  }
}
