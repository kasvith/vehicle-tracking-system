from flask import Flask, jsonify, request
from flask_cors import CORS
import uuid

import os

import Recognition

app = Flask(__name__)
CORS(app)

data = [
    {'name' : 'kasun', 'payload' : 'ok'}
]

@app.route("/vehicle", methods=['POST'])
def hello():
    if 'image' in request.files:
        f = request.files['image']
        ext = '.' + f.filename.split('.')[-1]
        filePath = 'tmp/' + str(uuid.uuid4()) + ext
        f.save('tmp/' + str(uuid.uuid4()) + ext)

        os.system('python Recognition.py')

        # Add here image processing
        # set payload
        return jsonify({'error' : 'false', 'message' : 'No vehicle ID found. Please retry or enter manually !', 'payload' : '123456'})
   
    return jsonify({'error' : 'true', 'message' : 'No image found'})


if __name__ == '__main__':
    app.run(debug=True)
   
    # initialize recognizion package

