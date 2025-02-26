jQuery(document).ready(function($) {

    var from = null;
    var draggables = null;
    let columns = document.querySelectorAll('.peg');
    
    columns.forEach(column => {
        column.addEventListener('dragover', (e) => {
            e.preventDefault();
        });
        column.addEventListener('drop', (e) => {
            e.preventDefault();
            let column = e.target;
            let parent = column.parentNode;
            to = Array.prototype.indexOf.call(parent.children, column);
            make_a_move(from, to);
        });
    });

    $.ajax({
        type: 'GET',
        url: hanoi_tower_object.rest_url + 'game-state',
        success: function(response) {
                update_pegs(response.pegs);
                $('#turn').text(hanoi_tower_object.game_start).removeClass('warn');
                $('#total-moves').text(hanoi_tower_object.total_moves + ': ' + response.moves);
        },
        error: function(response) {
            $('#turn').text(hanoi_tower_object.invalid_move).addClass('warn');
        }
    });

    $('#new-game').click(() => {
        $.ajax({
            type: 'GET',
            url: hanoi_tower_object.rest_url + 'new-game',
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                $('#turn').text(hanoi_tower_object.invalid_move).addClass('warn');
            }
        });
    });

    function make_a_move(from, to){
        if(from != to) {
            $.ajax({
                type: 'POST',
                url: hanoi_tower_object.rest_url + 'move-disk',
                data: {
                    from: from,
                    to: to
                },
                success: function(response) {
                    if (response.completed) {
                        update_pegs(response.pegs);
                        $('#turn').text(hanoi_tower_object.game_completed).addClass('success');
                        $('#total-moves').text(hanoi_tower_object.total_moves + ': ' + response.moves);
                    } else {
                        update_pegs(response.pegs);
                        $('#turn').text(hanoi_tower_object.good_move).removeClass('warn');
                        $('#total-moves').text(hanoi_tower_object.total_moves + ': ' + response.moves);
                    }
                },
                error: function(response) {
                    $('#turn').text(hanoi_tower_object.invalid_move).addClass('warn');
                }
            });
        }
    }

    function update_pegs(pegs){
        let discs = '';
        for(let i=0;i<3;i++){
            pegs[i].forEach(
                (element) =>{
                    discs = '<div class="disc disc-' + element + '"></div>' + discs;
                }
            );
            $('#hanoi-tower .peg:nth-of-type(' + (i+1) + ')').html(discs);
            if(discs.length > 0){
                $('#hanoi-tower .peg:nth-of-type(' + (i+1) + ') .disc:first-of-type').attr('draggable', 'true');
            }
            discs = '';
        }
        if(draggables !== null){
           draggables.forEach(item => { removeEventListener('dragstart',item) }); 
        }
        draggables = document.querySelectorAll('.disc[draggable]');
        draggables.forEach(item => {
            item.addEventListener('dragstart', (e) => {
                let column = e.target.parentElement;
                let parent = column.parentNode;
                from = Array.prototype.indexOf.call(parent.children, column);
            });
        });
    }
});