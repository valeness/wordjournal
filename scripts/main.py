#!/usr/bin/env python

from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from creds import dbinfo, user, passw
from listdb import Word, Base

import json

from random import choice, randrange
import smtplib

sender = "valeness84@gmail.com"
to = ['valeness84@gmail.com']

# Database Connection to grab words
engine = create_engine(dbinfo)
Base.metadata.bind = engine
DBSession = sessionmaker(bind=engine)
session = DBSession()

word = session.query(Word)

word_list = {}
choice_list = {}
id_list = []

f = open('used.json', 'r')
try: 
	used = json.load(f)
except:
	used = {}
f.close()

for i in word:
	id = i.id
	word = i.word
	defin = i.definition
	id_list.append(id)
	word_list[id] = word
	choice_list[id] = "%s: %s" % (word, defin)

#print used

word_id = choice(id_list)
word_choice = word_list[word_id]
run = True

total_words = len(word_list)
print("Total Words: %s") % total_words 
tries = 0

for i in range(0, total_words):
	if word_choice not in used:
		used[word_choice] = word_choice
		break
	elif tries < total_words:
		word_id = choice(id_list)
		word_choice = word_list[word_id]
		tries = tries + 1
		print(tries)
	if tries == 10:
		print "Dumping"
		used = {}
		break

f = open('used.json', 'w')
json.dump(used, f, indent=4)
f.close()

print("Word Choice: %s") % word_choice

try:
	print("Make Server")
	smtpObj = smtplib.SMTP('smtp.gmail.com:587')
	print("Ehlo")
	smtpObj.ehlo()
	print("Start SSL")
	smtpObj.starttls()
	print("Logging in")
	smtpObj.login(user, passw)
	print("Sending Mail")
	smtpObj.sendmail(sender, to, word_choice)
	print("Sent mail, now quit")
	smtpObj.quit()
	print("Quitted")
except SMTPException:
	print "Error"