$(function () {

    let equipementWindow = $('#equipement-window');
    let inventoryWindow = $('#inventory-window');
    let inventoryButton = $('#inventory-button');


    inventoryButton.on('click', function() {

        equipementWindow.toggleClass( "d-none" );
        inventoryWindow.toggleClass( "d-none" );
        inventoryButton.toggleClass( "bg-secondary" );
    });

});
