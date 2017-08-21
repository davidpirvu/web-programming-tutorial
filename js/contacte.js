function getRow(contact) {
    var id = contact.id;                        // validare variabila (valoarea ei sau nimic)
    var phone = contact.phone || '';            // validare variabila (valoarea ei sau nimic)
    var lastName = contact.lastName || '';      // validare variabila (valoarea ei sau nimic)
    var firstName = contact.firstName || '';    // validare variabila (valoarea ei sau nimic)
    var row = '<tr><td>' + lastName + '</td><td>' + firstName + '</td><td>' + phone + '</td>' +
        '<td class="actions">'+
            '<span><a href="date/remove-db.php?id=' + id + '">&#9986;</a></span> '+
            '<span><a href="#" class="edit" data-id="' + id + '">&#x270E;</a></span>'+
        '</td>' +
        '</tr>';
    return row;
}

var tableContent = '';

function createRow(contact) {
    tableContent += getRow(contact);
}

$.ajax('date/list.php', {                            // aduce date din fisier contacte.json
    cache: false,
    dataType: 'json'
}).done(function (contacte) {                         // ajax face un request
    console.debug('contacts loaded', contacte);
    contacte.forEach(createRow);                    // se creaza un string din contactele venite de pe server
    $("#contacts-list tbody").html(tableContent);

    //paragraful de mai jos(cu rol de editare) vine amplasat aici dupa ce am generat html-ul/linkurile. Creez apoi accesez.
    $('#contacts-list a.edit').click(function () {  // cu JS prind click. Caut titlul de tabel, sa fie link si clasa remove
        var id = $(this).data('id');                // this este convertit la un selector cu obiect jquery prin $ ca sa pot lua id-ul din this
        var contact = contacte.find(function(c) { // caut un contact dintre toate contactele care contine id-ul meu
            return c.id == id;
        })
        console.debug('remove', id, contact, this);

        $('input[name=id]').val(contact.id);                // cu aceste valori populez forma de sus pentru a fi editabil
        $('input[name=lastName]').val(contact.lastName);    // cu aceste valori populez forma de sus pentru a fi editabil
        $('input[name=firstName]').val(contact.firstName);  // cu aceste valori populez forma de sus pentru a fi editabil
        $('input[name=phone]').val(contact.phone);          // cu aceste valori populez forma de sus pentru a fi editabil
    });

    // $('.edit').click(function () { // inlocuit cu un cod mai bun, de mai sus
    //
    //     editContact('Ezra', 'Pirvu', '0741')
    // })
});

// function editContact(firstName, lastName, phone) {
//     $('input[name=firstName]').val(firstName);
//     $('input[name=lastName]').val(lastName);
//     $('input[name=phone]').val(phone);
// }



// 1. convert from array of arrays into json
// 3. remove contacts (UI)
// 4. edit contact (UI)
// 5. TODO php includes / templates