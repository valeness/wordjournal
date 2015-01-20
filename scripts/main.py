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
id_list = []

f = open('used.json', 'r')
try: 
	used = json.load(f)
except:
	used = {}
f.close()

for i in word:
	id = i.id
	print id
	word = i.word
	defin = i.definition
	id_list.append(id)
	word_list[id] = "%s: %s" % (word, defin)

#print used


word_id = choice(id_list)
word_choice = word_list[word_id]
run = True

while run:
	if word_id not in used:
		used[word_id] = word_choice
		run = False
	else:
		word_id = choice(id_list)
		word_choice = word_list[word_id]
		
f = open('used.json', 'w')
json.dump(used, f, indent=4)
f.close()

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
	smtpObj.sendmail(sender, to, word_list[word_id])
	print("Sent mail, now quit")
	smtpObj.quit()
	print("Quitted")
except SMTPException:
	print "Error"