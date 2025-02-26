# Author rel-me Link

This plugin, when activated, will add a `<link>` to the `<head>` of an Author
page with `rel="me"`, if that author has set a "Website" in their profile.

This can be useful for things like Mastodon URL verification.

## Example

If an author has set their website to `https://www.example.com`, this plugin
will add the following HTML to the `<head>` on their author page:

```
<link rel="me" href="https://social.example/@evelyn" />
```

To verify with Mastodon etc., the author would need to use the URL to their
Author archive page, typically something like
`https://www.your-site.example/author/evelyn`.
