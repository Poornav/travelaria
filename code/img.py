#! /usr/bin/env python
import sys
import io
import requests
city=str(sys.argv[1])
link='http://en.wikipedia.org/wiki/'+city
response = requests.get(link)
import bs4
#f=open('web7.txt','r+')

soup = bs4.BeautifulSoup(response.text)
data = soup.select('a.image')
#print(data)
#f.write(data)
a=1
for i in data:
	
	if a==1:
		print(i)
	a+=1
	#f.write(i)
#print(type(i))
