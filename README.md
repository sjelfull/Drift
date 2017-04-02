# Drift plugin for Craft CMS

Integrate [Drift.com](https://drift.com) with Craft

![Screenshot](resources/icon.png)

# About Drift

Drift helps your team generate more leads and book meetings faster using messaging.

## Installation

To install Drift, follow these steps:

1. Download & unzip the file and place the `drift` directory into your `craft/plugins` directory
2. Install plugin in the Craft Control Panel under Settings > Plugins
3. The plugin folder should be named `drift` for Craft to see it.

Drift works on Craft 2.4.x and Craft 2.5.x.

## Configuring Drift

[Get an account first with Drift.](https://drift.com/).
Then, add your tracking code in the plugin settings. You can get it from the [dashboard](https://app.drift.com/)

## Using Drift

Simply insert the template hook into your main layout file, right before the `</body>` end tag:

```twig
{% hook 'drift' %}
```

## Drift Roadmap

- Add Commerce stats (order #, LTV, etc.) to users

Brought to you by [Superbig](https://superbig.co)
