from bs4 import BeautifulSoup
from mysql.connector.errors import DatabaseError
import requests
import mysql.connector

html_text = requests.get('https://www.gensh.in/characters')
print(html_text)
soup = BeautifulSoup(html_text.text, "html.parser")
# images = soup.find_all('div', class_="character-card col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4 card-outer mb-4")

def desc_link():
    global soup
    desc_link=soup.select('div[class*="character-card col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4 card-outer mb-4"]')
    # for EachPart in desc_link:
        # print EachPart.a['href']
        # desc_link.append("https:/www.gensh.in" + EachPart.a['href'])
    # print (desc_link)
    index = len(desc_link)
    # print(index)
    i = 0
    while (i<index):
        desc_link[i]="https:/www.gensh.in"+desc_link[i].a['href']
        # print(desc_link[i])
        i+=1
    # print (desc_link)
    return desc_link

def images_ch():
    global soup
    images_ch=soup.select('img[class*="img-fluid"]')
    # for EachPart in images_ch:
    #     print EachPart['src']
        # images.append("https:/www.gensh.in" + EachPart.a['href'])
    # print(images_ch)
    # print(images_ch['src'])
    index_ch = len(images_ch)
    # print(index_ch)
    i = 0
    while (i<index_ch):
        images_ch[i]="https:/www.gensh.in"+images_ch[i]['src']
        # print(images_ch[i])
        i+=1
    return images_ch

def name_ch():
    global soup
    name_ch = soup.select('div[class*="nameblock"]')
    index_name = len(name_ch)
    # print(index_name)
    # for EachPart in name_ch:
        # print EachPart.h2.text
        # name.append("https:/www.gensh.in" + EachPart.a['href'])
    i=0
    while (i<index_name):
        name_ch[i]=name_ch[i].h2.text
        # print(name_ch[i].h2.text)
        # print(name_ch[i])
        i+=1
    return name_ch

# desc_link()
# images_ch()
# name_ch()

description = desc_link()
images = images_ch()
names = name_ch()

# print (description)

mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = "",
    database = "wibu-chan"
)

my_cursor = mydb.cursor()
# sql = "INSERT INTO character_genshin (name, image, description) VALUES (%s,%s,%s)"
# val = ("aiudhuh", "akfiush", "fhsjsf")
my_cursor.execute("INSERT INTO `character_genshin` (`name`, `image`, `description`) VALUES ('satu', 'dua', 'tiga'), ('', '', '')")

# INSERT INTO `character_genshin` (`name`, `image`, `description`) VALUES ('dsgwerwer', 'wer', 'werwerwe'), ('', '', '');

# my_cursor.execute(sql)
# my_cursor.execute("INSERT INTO character_genshin (name,image,description) VALUES (qwer,qwrqwe,grdr)")

mydb.commit()
# print(mydb)
# test = mydb.cursor()
# test.execute("tes 1 bang aslkdja")