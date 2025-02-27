/*  Copyright 2010  Michael J. Walker (email: mike@moztools.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function delete_embed(name) {
    return confirm('Are you sure you want to delete the embed "'+name+'"?');
}
function delete_group(name) {
    return confirm('Are you sure you want to delete the group "'+name+'"?\n\nAll embeds in this group will be moved to the "Default" group.');
}
function show_import_fields() {
    toggle_class('import-wrapper', 'embed-hide');
}
function uninstall_plugin() {
    toggle_class('uninstall', 'embed-hide');
    document.getElementById('uninstall-check').checked = false;
    document.getElementById('uninstall-button').disabled = true;
}
function uninstall_confirmed() {
    var disable = !document.getElementById('uninstall-check').checked;
    document.getElementById('uninstall-button').disabled = disable;
}
function toggle_class(id, classname) {
    var field = document.getElementById(id);
    field.className = field.className == '' ? classname : ''; 
}

jQuery(function($) {

    if ($('#manage-embed-page').length > 0) {
        
        $.embAjax = function(element, action, params, pos, fnReply) {
            params.action = action;
            element.setWaitingVisible(true, pos);        
            $.get($('#emb-ajax-url').val(), params, typeof fnReply != 'undefined' ? fnReply : function(data) {
                element.setWaitingVisible(false, pos);
                if (data != '1') {
                    $('#ajax-message span').show().text('Unable to contact the server. Settings not saved.');
                } else {
                    $('#ajax-message span').hide();
                }
            });  
        }

        $.fn.setWaitingVisible = function(state, pos) {
            if (state) {
                $(this).after($('#emb-spinner').clone().css('display', 'inline').attr('id', '').css('vertical-align', pos));
            } else {
                $(this).next().remove();
            }
        }
        
        $('.global-option').click(function(event) {
            var option = event.target;
            $.embAjax($(option), 'emb_set_global_option', { id: option.id, val: option.checked }, 'middle');
        });
        
        $('.group-expand').live('click', function(event) {
            var link = $(event.currentTarget);
            link.toggleClass('group-visible');
            $('.embed-titles, .embed-listing', '#'+link.groupId()).toggleClass('group-hide');
            $.embAjax(link.next().next(), 'emb_toggle_group', { id:link.groupName()}, 'bottom');
            return false;        
        });

        $('#show-all-groups, #hide-all-groups').click(function(event) {
            var show = event.currentTarget.id == 'show-all-groups';
            $('.group-expand').toggleClass('group-visible', show);
            $('.embed-titles, .embed-listing').toggleClass('group-hide', !show);
            $.embAjax($('#hide-all-groups'), 'emb_toggle_group', { id:'all', val: show}, 'middle');
            return false;        
        });

        $.fn.embedName = function(name) {
            if (typeof name == 'undefined') {
                return this.closest('tr').attr('id').substr('embed-row-'.length);
            } else {
                this.closest('tr').attr('id', 'embed-row-'+name);
            }
            return this;
        }
        
        $.fn.embedData = function(data) {
            if (typeof data == 'undefined') {
                return this.closest('tr').data('embed');
            } else if (data != null) {
                this.closest('tr').data('embed', data);
            } else {
                this.closest('tr').removeData('embed');
            }
            return this;
        }
        
        $.fn.groupName = function(name) {
            if (typeof name == 'undefined') {
                return this.closest('table').attr('summary');
            } else {
                this.closest('table').attr('summary', name);
            }
            return this;
        }
            
        $.fn.groupId = function(name) {
            if (typeof name == 'undefined') {
                return this.closest('table').attr('id'); 
            } else {
                name = 'gp-'+name.replace(/\s/, '-').toLowerCase();
                this.closest('table').attr('id', name);
            }
            return this;
        }
        
        $.fn.groupData = function(data) {
            if (typeof data == 'undefined') {
                return this.closest('table').data('group');
            } else if (data != null) {
                this.closest('table').data('group', data);
            } else {
                this.closest('table').removeData('group');
            }
            return this;
        }
           
        /**
         * Rename a group via Ajax.
         */
        $('.group-rename').live('click', function(event) {
            var link = $(event.target);
            table = link.closest('table');
            if (!table.groupData()) {
                dialog = $('thead tr:first', table).renameDialog($('#rename-group-dialog'), 'emb_rename_group', 'group', table.groupName(), function(data) {
                    table.remove();
                    $(data).insertTable();
                });
                table.groupData(dialog);
                $('.cancel', dialog).click(function(event) {
                    table.groupData().remove();
                    table.groupData(null);
                });
            } else {
                table.groupData().remove();
                table.groupData(null);
            }
            return false;
        });

        $('#add-new-group').click(function(event) {
            var table = $('#new-group-table').removeClass('group-hide');
            if (!table.groupData()) {
                dialog = $('thead', table).renameDialog($('#new-group-dialog'), 'emb_add_group', 'group', '', function(data) {
                    $('tr', table).remove();
                    $(data).insertTable();
                    table.groupData(null);
                });
                table.groupData(dialog);
                $('.cancel', dialog).click(function(event) {
                    table.groupData().remove();
                    table.groupData(null);
                });
            } else {
                table.groupData().remove();
                table.groupData(null);
            }
            return false;
        });
        
        /**
         * Rename a group via Ajax.
         */
        $('.embed-rename, .embed-copy').live('click', function(event) {
            var link = $(event.target);
            var dialog = link.hasClass('embed-rename') ? $('#rename-embed-dialog') : $('#copy-embed-dialog');  
            var fnajax = link.hasClass('embed-rename') ? 'emb_rename_embed' : 'emb_copy_embed';
            var row = link.closest('tr');
            if (!row.embedData()) {
                var table = link.closest('table');
                var name = row.embedName();
                dialog = row.renameDialog(dialog, fnajax, 'embed', name, function(data) {
                    table.remove();
                    $(data).insertTable();
                });
                row.embedData(dialog);
                $('.cancel', dialog).click(function(event) {
                    row.embedData().remove();
                    row.embedData(null);
                });
            } else {
                row.embedData().remove();
                row.embedData(null);
            }
            return false;
        });

        $.fn.renameDialog = function(dialog, fnajax, type, oldName, fnaction) {
            dialog = dialog.clone().attr('id', '')
                           .removeClass('dialog-hide').wrap('<tr><td colspan="6" style="padding:0"></td></tr>')
                           .closest('tr');
            $('.submit', dialog).click(function(event) {
                var name = $.trim($('#new-name', dialog).val());
                var msg = '';
                var regex = type == 'group' ? /^[\w-\s]+$/ : /^[\w-]+$/;
                if (name.length == 0 || name == oldName) {
                    msg = 'Please supply a new name for the '+type+'.';
                } else if (name.length > 63) {
                    msg = 'Error: The new name must have fewer than 64 characters.'
                } else if (!name.match(regex)) {
                    msg = 'Error: The new name contains invalid characters.'
                }
                if (msg != '') {
                    $('.dialog-message', dialog).text(msg);
                } else {
                    $('.dialog-message', dialog).text('');
                    var newName =  $('#new-name', dialog).val();
                    $.embAjax($('.cancel', dialog), fnajax, { id:oldName, val: newName}, 'middle', function(data) {
                        $('.cancel', dialog).setWaitingVisible(false);
                        if (data.length > 1 && data.substr(0, 5) != 'ERROR') {
                            fnaction(data); 
                        } else if (data == '0') {
                            $('.dialog-message', dialog).text('Unable to contact server. Settings not saved.');
                        } else {
                            $('.dialog-message', dialog).text(data);
                        }
                    });
                }
            });
            this.after(dialog);
            $('#new-name', dialog).val(oldName).focus(function(event) {
                $('.dialog-message', dialog).text('');
                this.select();
            }).focus();
            return dialog;
        }
        
        /**
         * Enable/disable a group via Ajax.
         */
        $('.group-enable-all, .group-disable-all').live('click', function(event) {
            var link = $(event.target);
            var table = link.closest('table');
            var group = table.groupName();
            var after = $('.group-expand', table).next().next();
            var state = link.hasClass('group-disable-all');
            $.embAjax(after, 'emb_disable_group', { group: group, state: state}, 'bottom', function(data) {
                after.setWaitingVisible(false);
                if (data == '1') {
                    $('tbody tr', table).toggleClass('embed-disabled', state);
                    $('.embed-disable', table).toggleClass('embed-hide', state);
                    $('.embed-enable', table).toggleClass('embed-hide', !state);
                } else if (data == '0') {
                    alert('Unable to contact server. Settings not saved.');
                }
            });
            return false;
        });

        /**
         * Delete a group via Ajax
         */
        $('.group-delete').live('click', function(event) {
            var link = $(event.target);
            var table = link.closest('table');
            var group = table.groupName();
            var after = $('.group-expand', table).next().next();
            if (delete_group(group)) {
                $.embAjax(after, 'emb_delete_group', { group: group }, 'bottom', function(data) {
                    after.setWaitingVisible(false);
                    if (data.length > 1) {
                        table.remove();
                        table = $(data).insertTable();
                    } else if (data == '') {
                        table.remove();
                    } else if (data == '0') {
                        alert('Unable to contact server. Changes not saved.');
                    }
                });
            }
            return false;
        });

        $.fn.insertTable = function() {
            tables = $('table.embeds');
            var empty = this.hasClass('empty-group');
            var name = this.groupName().toLowerCase();
            for (i = 0; i < tables.length; i++) {
                if ($(tables[i]).groupName().toLowerCase() == name) {
                    break;
                } else if (!empty && ($(tables[i]).hasClass('empty-group') || $(tables[i]).groupName().toLowerCase() > name)) {
                    break;
                } else if (empty && $(tables[i]).hasClass('empty-group') && $(tables[i]).groupName().toLowerCase() > name) {
                    break;
                }
            }
            if (i < tables.length && $(tables[i]).groupName().toLowerCase() == name) {
                $(tables[i]).remove();
            }
            if (i > 0 && (!empty || $(tables[i-1]).hasClass('empty-group'))) {
                this.insertAfter($(tables[i-1]));
            } else if (i > 0 || i == 0 && empty) {
                this.insertAfter($('#empty-groups'));
            } else {
                this.insertAfter($('#hide-all-groups'));
            }
            $.setupAjax();
        }
        
        /**
         * Enable/disable an embed via Ajax
         */
        $('.embed-disable, .embed-enable').live('click', function(event) {
            var link = $(event.target);
            var row = link.closest('tr');
            var name = row.embedName();
            $.embAjax($('.embed-name', row), 'emb_disable_embed', { id:name, val: link.hasClass('embed-disable')}, 'middle', function(data) {
                $('.embed-name', row).setWaitingVisible(false);
                if (data == '1') {
                    row.toggleClass('embed-disabled');
                    $('.embed-disable, .embed-enable', row).toggleClass('embed-hide');
                } else if (data == '0') {
                    alert('Unable to contact server. Settings not saved.');
                }
            });
            return false;
        });
        
        /**
         * Delete an embed via Ajax
         */
        $('.embed-delete').live('click', function(event) {
            var link = $(event.target);
            var row = link.closest('tr');
            var name = row.embedName();
            if (delete_embed(name)) {
                $.embAjax($('.embed-name', row), 'emb_delete_embed', { id: name }, 'middle', function(data) {
                    $('.embed-name', row).setWaitingVisible(false);
                    if (data == '1') {
                        row.remove();
                    } else if (data == '0') {
                        alert('Unable to contact server. Changes not saved.');
                    }
                });
            }
            return false;
        });

        $.setupAjax = function() {
            $('tbody tr').draggable({cursorAt: {right:5, bottom:2}, handle: '.drag-handle', helper: function() {
                return $('td:first', this).clone().css({background:'#ccf', border:'1px solid #88f'});
            }});
            
            $('table.embeds').droppable({hoverClass: 'embed-drag-hover', drop: function(event, ui) {
                var table = $(event.target);
                var group = table.groupName();
                if (group != ui.draggable.groupName()) {
                    var embed = ui.draggable.embedName();
                    var after = $('.group-expand', table).next().next();
                    $.embAjax(after, 'emb_move_embed', { embed: embed, group: group }, 'middle', function(data) {
                        after.setWaitingVisible(false);
                        if (data.length > 1) {
                            fromTable = ui.draggable.closest('table');
                            ui.draggable.remove();
                            if ($('tbody tr', fromTable).length == 0) {
                                $('.group-expand, .embed-titles, .embed-listing, .populated-group-actions', fromTable).addClass('group-hide');
                                fromTable.addClass('empty-group').detach().insertTable();
                            }
                            if (table.hasClass('empty-group')) {
                                table.removeClass('empty-group').insertTable();
                            }
                            table.empty().append($(data).children());
                            $.setupAjax();
                        } else if (data == '0') {
                            alert('Unable to contact server. Changes not saved.');
                        }
                    });
                }
            }});
        }
        $.setupAjax();
    }
    
    $('.option').click(function() {
        var optional = $('#optional-'+$(this).attr('id'));
        if (optional.length > 0) {
            if ($(this).is(':checked')) {
                optional.show();
            } else {
                optional.hide();
            }
        }
    });
    
    $('.option:checked').each(function() {
        $('#optional-'+$(this).attr('id')).show();
    });

    $.handleEmbedOptions = function() {
        var checked = $('#autoembed-row .option:checked');
        if (checked.length > 0) {
            $('#priority-row, #include-row').show();

            var pagecheck = $('#before-page-content:checked, #after-page-content:checked');
            if (pagecheck.length > 0) {
                $('.pages-only').show();
            } else {
                $('.pages-only').hide();
            }
        } else {
            $('#priority-row, #include-row').hide();
        }
    }
    $('#autoembed-row .option').click(function() {
        $.handleEmbedOptions();
    });
    $.handleEmbedOptions();
    
    $('#wpfooter').remove().appendTo('#wpwrap');
    
    
});
