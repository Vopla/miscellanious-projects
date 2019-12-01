import os
import praw
import commands
import discord

from dotenv import load_dotenv
from discord.ext import commands

load_dotenv()
token = os.getenv('DISCORD_TOKEN')
GUILD = os.getenv('DISCORD_GUILD')
client_id = os.getenv('CLIENT_ID')
SECRET = os.getenv('SECRET')

client = discord.Client()

reddit = praw.Reddit(client_id = client_id,
client_secret = SECRET,
user_agent = 'Linux:discordBot:v.0.0.1 by /u/voplaalpov')

def read_from_subreddit(subreddit_name, limit):
    response = ''
    for submission in reddit.subreddit(subreddit_name).hot(limit=limit):
        response += submission.title
    
    return response

@client.event
async def on_ready():
    print(f'{client.user.name} has connected to Discord!')

@client.event
async def on_message(message):
    if message.author == client.user:
        return

    if message.content == '!hello':
        response = f'Hello {message.author.display_name} AKA {message.author.name}!'
        await message.channel.send(response)

client.run(token)