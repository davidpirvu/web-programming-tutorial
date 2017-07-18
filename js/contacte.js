function getRow(contact) {
    var id = contact.id || '';
    var phone = contact.phone || '';
    var lastName = contact.lastName || '';
    var firstName = contact.firstName || '';
    var row = '<tr><td>' + lastName + '</td><td>' + firstName + '</td><td>' + phone + '</td>' +
        '<td>[<a href="date/removed.html?id=' + id + '">x '+id+'</a>]</td>' +
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
});

// 1. convert from array of arrays into json
// 2. load contacts from json file with AJAX
// 3. remove contacts (UI)
// 4. edit contact (UI)
