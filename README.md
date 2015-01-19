Demo application for Yii2-SyncSocial
====

Create `syncsocial.json` in project folder and put this code:

```json
{
    "facebook": {
        "clientId": "YOUR_FACEBOOK_APP_KEY",
        "clientSecret": "YOUR_FACEBOOK_APP_SECRET",
        "scope": "offline_access,publish_actions,read_stream"
    },
    "vkontakte": {
        "clientId": "YOUR_VKONTAKTE_APP_KEY",
        "clientSecret": "YOUR_VKONTAKTE_APP_SECRET",
        "scope": "wall,offline"
    },
    "twitter": {
        "consumerKey": "YOUR_TWITTER_APP_KEY",
        "consumerSecret": "YOUR_TWITTER_APP_SECRET"
    },
    "google": {
        "clientId": "YOUR_GOOGLE_APP_KEY",
        "clientSecret": "YOUR_GOOGLE_APP_SECRET",
        "scope": "profile email https://www.googleapis.com/auth/plus.me"
    }
}
```