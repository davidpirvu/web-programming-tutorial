function getRow(contact) {
    var id = contact.id;                     // validare variabila (valoarea ei sau nimic)
    var phone = contact.phone || '';        // validare variabila (valoarea ei sau nimic)
    var lastName = contact.lastName || '';  // validare variabila (valoarea ei sau nimic)
    var firstName = contact.firstName || ''; // validare variabila (valoarea ei sau nimic)
    var row = '<tr><td>' + lastName + '</td><td>' + firstName + '</td><td>' + phone + '</td>' +
        '<td class="actions">'+
            '<span><a href="date/removed.html?id=' + id + '">&#9986;</a></span> '+
            '<span><a class="edit" href="#">&#x270E;</a></span>'+
        '</td>' +
        '</tr>';
    return row;
}

var tableContent = '';

function createRow(contact){
    tableContent += getRow(contact);
}

$.ajax('date/contacte.json').done(function(contacte){
    console.info('contacte', contacte);
    contacte.forEach(createRow);
    $("#contacts-list tbody").html(tableContent);

    $('.edit').click(function () {
        // TODO
        editContact('Ezra', 'Pirvu', '0741')
    })
});

function editContact(firstName, lastName, phone) {
    $('input[name=firstName]').val(firstName);
    $('input[name=lastName]').val(lastName);
    $('input[name=phone]').val(phone);
}



// 1. convert from array of arrays into json
// 2. load contacts from json file with AJAX
// 3. remove contacts (UI)
// 4. edit contact (UI)
