from bs4 import BeautifulSoup
import requests

html_text = requests.get('https://www.gensh.in/characters')
print(html_text)
soup = BeautifulSoup(html_text.text, "lxml")
images = soup.find_all('div', class_="character-card col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4 card-outer mb-4 cw-Sword ce-Adaptive cr-5") 
# temp = images.a["href"]
# print(temp)
for image in images:
    # image.append("https://www.gensh.in/")
    # image = image.a['href']
    # image = "https://www.gensh.in/" + image
    print(image)
# inner_img = images.find_all('img', class_='img-fluid')
# print(inner_img)
