from creds import dbinfo

import os
import sys
from sqlalchemy import Column, ForeignKey, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import relationship
from sqlalchemy import create_engine

Base = declarative_base()

class Word(Base):
	__tablename__ = 'words'
	
	# Define Columns
	id = Column(Integer, primary_key=True)
	word = Column(String(250), nullable=False)
	definition = Column(Text, nullable=False)

engine = create_engine(dbinfo)

Base.metadata.create_all(engine)
