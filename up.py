#!/usr/bin/python3

import subprocess
import shlex


def parse_envfile(env_filename):
    env_file = open(env_filename,'r')
    vars_dict = {}
    for line in env_file.readlines():
        [arg,val] = line.strip().split('=')
        vars_dict[arg] = val
    return vars_dict

def spawn_webserver_process(vars_dict):
    subprocess.run("php -S localhost:{} -t {}".format(vars_dict['WEBSERVER_PORT'],vars_dict['WEBSERVER_ROOT']),shell=True)

vars_dict = parse_envfile('.env')
spawn_webserver_process(vars_dict)