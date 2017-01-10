#! /usr/bin/env python
import io
import requests
response = requests.get('http://todays-date.net/')
import bs4
soup = bs4.BeautifulSoup(response.text)
data=soup.select('p')
month=str.lower(str(data[0]).split(' ')[2])
print(month)
sellink=requests.get('http://thebesttimetovisit.com/weather/wheretogoin'+month+'.php')
soup = bs4.BeautifulSoup(sellink.text)
data=soup.select('tbody tr a')
j=0
k=0
cities=[]
for i in data:
	if j<7:
		j+=1
		continue
	city=str(i.get_text())
	if len(city)==0:
		continue
	if k>2:
		break
	pos=city.find('(')
	cities.append(city[pos+1:-1])
	k+=1

for city in cities:
	link='http://en.wikipedia.org/wiki/'+city
	response = requests.get(link)
	soup = bs4.BeautifulSoup(response.text)
	data1 = soup.select('div.mw-content-ltr p')
	data2 = soup.select('table.infobox.geography.vcard p')
	imgs=soup.select('a.image')
	for i in range(len(data2)):
		if data2[i] in data1:
			data1.pop(i)
	a=1
	for i in data1:
		if a==1:
			print(i.get_text())
			print(imgs[0])
			print("")
		a+=1
