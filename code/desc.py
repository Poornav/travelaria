#! /usr/bin/env python
import sys
import io
import requests
city=str(sys.argv[1])
response = requests.get('http://en.wikipedia.org/wiki/'+city)
import bs4
soup = bs4.BeautifulSoup(response.text)
data1 = soup.select('div.mw-content-ltr p')
data2 = soup.select('table.infobox.geography.vcard p')
for i in range(len(data2)):
	if data2[i] in data1:
		data1.pop(i)
a=1
for i in data1:
	if a==1:
		print(i.get_text())
	a+=1

