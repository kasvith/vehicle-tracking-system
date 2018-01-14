FROM python:2.7

MAINTAINER Kasun Vithanage <alankasun@gmail.com>

RUN mkdir -p /usr/src/app 
WORKDIR /usr/src/app 

# Various Python and C/build deps
RUN apt-get update && apt-get install -y \ 
    python-dev \ 
    libopencv-dev \ 
    libav-tools  \ 
    libjpeg-dev \ 
    libpng-dev \ 
    python-numpy \ 
    python-pycurl \ 
    libatlas-base-dev \
    python-opencv \ 
    libvtk6-dev \ 
    zlib1g-dev 

# Install Open CV - Warning, this takes absolutely forever
RUN pip install  --no-cache-dir opencv-python

COPY requirements.txt /usr/src/app/
RUN pip install --no-cache-dir -r requirements.txt

COPY . /usr/src/app 