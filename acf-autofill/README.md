# ACF Autofill

A very lightweight WordPress plugin autofills ACF fields for quicker building and testing.

## What does it do?

ACF Autofill is a handy tool to autofill your ACF fields when building or testing a website.

## How does it work?

ACFA needs little to no configuration to start testing, but there are a few things that are nice to know before you start.

### Fallback images

The first step when activating the plugin, is uploading some fallback images in ACFA settings.

### Field name checks

ACFA does two checks when filling a field. First it checks the field type, e.g. repeater or text. Then it looks at your fieldname. If it recognizes the fieldname, it fills in an appropriate value. Otherwise it just uses a random fallback. The recognized fields and corresponding field names are:

- flexible content
- image
- - avatar
- - small-image
- - medium-image
- - card-image
- - large-image
- - featured-image
- - header-image
- link
- - external-link
- - internal-link
- - read-more
- radio
- repeater
- text
- - name
- - email / e-mail
- - testimonial
- - quote
- - address
- - zipcode
- - city
- textarea
- - summary
- - excerpt
- - intro
- wysiwyg

### Early Access

The plugin is still in early access, and not all ACF fields are autofillable yet. I'm still working on this, so please keep that in mind when leaving reviews. Positive reviews might push me to finish the plugin sooner. :)

### What to expect

Some features I will likely add in the future, let me know which ones you'd want first:
- "Kill my site" mode, to test longer words and content
- "Generate kitchensink" button, to fill one page with all available flexible layouts
- Custom data, a way to upload or fill in custom data and link it to custom fieldnames
- Autofill the other field types
- Exclude fields option
