FROM python:2.7

MAINTAINER Kasun Vithanage <alankasun@gmail.com>

RUN mkdir -p /usr/src/app 
WORKDIR /usr/src/app 

# Various Python and C/build deps
RUN apt-get update && apt-get install -y \ 
    python-numpy \ 
    python-pycurl \ 
    python-opencv

# Install Open CV
RUN pip install  --no-cache-dir opencv-python