FROM node:20-alpine

WORKDIR /usr/src/app

# Copiando package.json e package-lock.json do frontend
COPY package*.json ./

RUN npm install

# Agora copia o restante dos arquivos do frontend
COPY . .

#CMD ["npm", "run", "start"]
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]

