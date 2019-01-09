/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function valitse_kaikki(box) {
    var checkboxit = document.getElementsByName('poistettavat[]');
    for (var i=0;i<checkboxit.length;i++){
        checkboxit[i].checked = box.checked;
    }
}

