This repository contains the tools you need to quickly set up a telegram bot in PHP.
<br>This library is based on the official [Telegram Bot API](https://core.telegram.org/bots/api).</br>

## Table of Contents
- [Introduction](#introduction)
- [Instructions](#instructions)
  - [Create your first bot](#create-your-first-bot)
- [Setting up the webhook](#webhook-setup)
	- [Connect the webhook to your Telegram Bot](#connect-webhook)
- [Get Started](#examples)
  - [Sending Messages](#msg_send)
  - [Hyperlink message](#hyperlink)
  - [Keyboard](#keyboard)
  - [Standard Keyboard](#keyboard)
	- [Inline Keyboard](#inlineKeyboard)
   	- [Remove Keyboard](#keyboardremove)
    - [Callback Update](#callback)
- [Utils](#utils)
	- [Store message on MySQL Database](#mysql)
  	- [Access to received messages](#msg_received)
  	- [Autodelete older messages](#msg_received_delete)
  - [Connect your bot to a channel](#channel)
        
 ## Introduction
 This is a PHP library ready to be used to build your own bot.
 <br>No need to install using composer, just clone this repository in your workspace and you're ready to go.</br>
 <br>This allows you to: </br>
 
 - Retrive updates via Webhook.
 - Send messages with additional support such as sending [hyperlinks messages](#hyperlink).
 - Have access to [previously received messages](#msg_received).
 - Use Keyboard (Standard and Inline Keyboard).
 - Support to Callbacks buttons.
 
 ## Instructions
 ### Create Your First Bot
1. Message [`@BotFather`](https://telegram.me/BotFather) with the following text: `/newbot`

2. `@BotFather` replies with:

    ```
    Alright, a new bot. How are we going to call it? Please choose a name for your bot.
    ```
3. Type whatever name you want for your bot.

4. `@BotFather` replies with:

    ```
    Good. Now let's choose a username for your bot. It must end in `bot`. Like this, for example: TetrisBot or tetris_bot.
    ```
5. Type whatever username you want for your bot, minimum 5 characters, and must end with `bot`.

6. `@BotFather` replies with:

    ```
    Done! Congratulations on your new bot. You will find it at
    telegram.me/exampleBOT. You can now add a description, about
    section and profile picture for your bot, see /help for a list of
    commands.

    Use this token to access the HTTP API:
    123456789:AAG93e14-0f8-48183F-18911dCE

    For a description of the Bot API, see this page:
    https://core.telegram.org/bots/api
    ```
    
7. Note down the 'token' mentioned above, you will use this later on.

## Setting up the webhook
There are two mutually exclusive ways of receiving updates for your bot — the getUpdates method on one hand and Webhooks on the other. Incoming updates are stored on the server until the bot receives them either way, but they will not be kept longer than 24 hours.
Indeed, we'll be using a webhook which enable us to let the bot will automatically respond to received messages in real-time.
We will need to secure the connection between the telegram bot and the webhook via HTTPS, so we need to install SSL/TLS certificates on the server that will host the webhook.

### Connect the webhook to your Telegram Bot
Once we've installed the SSL certificates onto your server we need connect the webhook to the telegram bot
1. Go to `api.telegram.com/botTOKEN/setWebhook?url=WEBHOOK` replacing the `TOKEN` and `WEBHOOK` part with the token that BotFather gave us and the URL of the webhook.
It should look similar to this: 
	```
	http://api.telegram.org/bot123456789:AAG93e14-0f8-48183F-18911dCE/setWebhook?url=https://examplewebsite.com
	```
2. The webpage will display the following string, meaning that the webhook was succesfully connected.
	```
	{"ok":true,"result":true,"description":"Webhook was set"}
	```

## Get Started
We're now ready to start using the library
1. Go to your webserver folder.
2. Clone this repository to your own workspace using the command `git clone https://github.com/albycrescini/telegrambot-php`
3. A new folder called `telegrambot-php` will be created.

### Sending Messages

