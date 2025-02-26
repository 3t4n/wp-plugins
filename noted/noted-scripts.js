jQuery(document).ready(function($) {
    // Toggle side panel on icon click
    $(document).on('click', '.noted-icon', function(e) {
        e.preventDefault();
        $('#noted-panel').toggleClass('open');
        loadNotes(); // Load notes when the panel opens
    });

    // Close side panel on close button click
    $(document).on('click', '#noted-close', function() {
        $('#noted-panel').removeClass('open');
    });

    // Add new note handler
    function setupAddNoteHandler() {
        $('#noted-add').off('click').on('click', function() {
            if (typeof noted !== 'undefined') {
                let title = $('#noted-title').val();
                let description = $('#noted-description').val();

                $.post(noted.ajax_url, {
                    action: 'noted_add_note',
                    nonce: noted.nonce,
                    title: title,
                    description: description
                }, function(response) {
                    if (response.success) {
                        $('#noted-title').val('');
                        $('#noted-description').val('');
                        loadNotes();
                    }
                });
            }
        });
    }

    // Load notes from the server
    function loadNotes() {
        if (typeof noted !== 'undefined') {
            $.post(noted.ajax_url, {
                action: 'noted_fetch_notes',
                nonce: noted.nonce
            }, function(response) {
                if (response.success) {
                    let notesList = $('#noted-list').empty();
                    $.each(response.data, function(index, note) {
                        // Create the note HTML structure
                        let noteElement = $(`
                            <div class="noted-note" data-note-id="${note.id}">
                                <div class="noted-note-header">
                                    <span class="noted-note-title">${note.title}</span>
                                    <span class="noted-note-timestamp">${note.timestamp}</span>
                                </div>
                                <div class="noted-note-description">
                                    <div class="note-content"></div>
                                    <div class="noted-note-meta">
                                        <span class="noted-note-username">${note.username}</span>
                                        <div class="noted-note-actions">
                                            <a href="#" class="noted-note-edit" data-note-id="${note.id}" data-markdown="${encodeURIComponent(note.markdown)}">Edit</a> |
                                            <a href="#" class="noted-note-delete" data-note-id="${note.id}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        // Insert HTML content into the note-content div
                        noteElement.find('.note-content').html(note.description);
                        notesList.append(noteElement);
                    });
                    attachNoteEvents();
                }
            });
        }
    }

    // Attach events for opening and editing notes
    function attachNoteEvents() {
        $('.noted-note-header').off('click').on('click', function() {
            const note = $(this).closest('.noted-note');
            const noteDescription = note.find('.noted-note-description');

            // Only toggle accordion if the note is not in edit mode
            if (!note.hasClass('editing')) {
                noteDescription.toggleClass('open'); // Toggle open class for smooth animation
            }
        });

        $('.noted-note-edit').off('click').on('click', function(e) {
            e.preventDefault();
            let noteId = $(this).data('note-id');
            startEditing(noteId);
        });

        $('.noted-note-delete').off('click').on('click', function(e) {
            e.preventDefault();
            let noteId = $(this).data('note-id');
            if (confirm("Are you sure you want to delete this note?")) {
                deleteNote(noteId);
            }
        });
    }

    // Start editing a note
    function startEditing(noteId) {
        let noteElement = $(`.noted-note[data-note-id='${noteId}']`);
        noteElement.addClass('editing');

        let titleElement = noteElement.find('.noted-note-title');
        let editLink = noteElement.find('.noted-note-edit');
        let markdown = decodeURIComponent(editLink.data('markdown'));

        let originalTitle = titleElement.text().trim();

        titleElement.html(`<input type="text" class="edit-note-title" value="${originalTitle}" style="width: calc(100% - 6px); padding: 3px;">`);
        noteElement.find('.note-content').replaceWith(`
            <textarea class="edit-note-description" style="width: calc(100% - 8px); padding: 5px; margin-top: 5px;">${markdown}</textarea>
            <div class="edit-actions">
                <button class="save-note">Save</button>
                <button class="cancel-note">Cancel</button>
            </div>
        `);

        noteElement.find('.noted-note-description').addClass('open');

        noteElement.find('.save-note').on('click', function() {
            let updatedTitle = noteElement.find('.edit-note-title').val();
            let updatedDescription = noteElement.find('.edit-note-description').val();
            saveEdit(noteId, updatedTitle, updatedDescription);
        });

        noteElement.find('.cancel-note').on('click', function() {
            cancelEdit(noteId, originalTitle, markdown);
        });
    }

    // Cancel editing and revert to original content
    function cancelEdit(noteId, originalTitle, originalMarkdown) {
        let noteElement = $(`.noted-note[data-note-id='${noteId}']`);
        noteElement.removeClass('editing');

        // Fetch the note's current HTML content
        $.post(noted.ajax_url, {
            action: 'noted_fetch_notes',
            nonce: noted.nonce
        }, function(response) {
            if (response.success) {
                const note = response.data.find(n => n.id === parseInt(noteId));
                if (note) {
                    noteElement.find('.noted-note-title').html(originalTitle);
                    noteElement.find('.noted-note-description').html(`
                        <div class="note-content">${note.description}</div>
                        <div class="noted-note-meta">
                            <span class="noted-note-username">${note.username}</span>
                            <div class="noted-note-actions">
                                <a href="#" class="noted-note-edit" data-note-id="${noteId}" data-markdown="${encodeURIComponent(originalMarkdown)}">Edit</a> |
                                <a href="#" class="noted-note-delete" data-note-id="${noteId}">Delete</a>
                            </div>
                        </div>
                    `);
                    attachNoteEvents();
                }
            }
        });
    }

    // Save the edited note
    function saveEdit(noteId, title, description) {
        if (typeof noted !== 'undefined') {
            $.post(noted.ajax_url, {
                action: 'noted_edit_note',
                nonce: noted.nonce,
                note_id: noteId,
                title: title,
                description: description
            }, function(response) {
                if (response.success) {
                    loadNotes();
                }
            });
        }
    }

    // Delete a note
    function deleteNote(noteId) {
        if (typeof noted !== 'undefined') {
            $.post(noted.ajax_url, {
                action: 'noted_delete_note',
                nonce: noted.nonce,
                note_id: noteId
            }, function(response) {
                if (response.success) {
                    $(`.noted-note[data-note-id='${noteId}']`).remove();

                    if ($('#noted-list').children().length === 0) {
                        loadNotes();
                    }
                }
            });
        }
    }

    // Initialize
    setupAddNoteHandler();
    loadNotes();
});

// Register button in block editor's more menu
if (typeof wp !== 'undefined' && wp.plugins && wp.editPost && wp.element) {
    const { registerPlugin } = wp.plugins;
    const { PluginSidebarMoreMenuItem } = wp.editPost;

    wp.domReady(() => {
        registerPlugin('noted-plugin', {
            render: () => (
                wp.element.createElement(PluginSidebarMoreMenuItem, {
                    icon: 'admin-comments',
                    onClick: () => {
                        const notedPanel = document.getElementById('noted-panel');
                        if (notedPanel) {
                            notedPanel.classList.toggle('open');
                        }
                    }
                }, 'Noted!')
            ),
            icon: 'admin-comments'
        });
    });
}

// Adjust layout for admin bar visibility
document.addEventListener('DOMContentLoaded', function() {
    const adminBar = document.getElementById('wpadminbar');
    if (adminBar && window.getComputedStyle(adminBar).display !== 'none') {
        document.body.classList.add('has-visible-admin-bar');
    }
});