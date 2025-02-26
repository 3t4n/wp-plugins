# Highlight comments on permalink pages
( ( $ ) ->
  comment_id = ( location.hash.match( /^#comment-[0-9]+$/ ) or [] ).pop()

  # Check for comment permalinks, which use hashes like #comment-1234
  return unless comment_id

  highlighter = ->
    # Cache the comment element and make sure it exists
    $el = $ comment_id
    return unless $el

    # Cache the original background color so we can restore it later
    origColor = $el.css 'backgroundColor'

    # Highlight the comment, then fade away the highlight
    $el.css
      backgroundColor: '#FBEAB6'  # Yellow-ish
    .animate
      backgroundColor: origColor
    , 2000

  # Bind ready handler
  $ highlighter
) jQuery