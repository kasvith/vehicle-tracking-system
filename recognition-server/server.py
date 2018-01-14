from flask import Flask, jsonify, request
from flask_cors import CORS
import uuid
import os
import Main

app = Flask(__name__)
CORS(app)

@app.route("/vehicle", methods=['POST'])
def hello():
    if 'image' in request.files:
        f = request.files['image']
        ext = '.' + f.filename.split('.')[-1]
        filePath = 'tmp/' + str(uuid.uuid4()) + ext
        f.save(filePath)

        vehicle_id = Main.recognise(filePath)
       
        if vehicle_id<0 :
        	return jsonify({'error' : 'true', 'message' : 'No vehicle ID found. Please retry or enter manually !', 'payload' :'-1'})
   		else :
   			return jsonify({'error' : 'false', 'message' : 'Vehicle ID Found', 'payload' : vehicle_id})
   			
    return jsonify({'error' : 'true', 'message' : 'No image found'})


if __name__ == '__main__':
    app.run(debug=True)
   

