package com.latihan.latihan173.controller;

import com.latihan.latihan173.model.UserApp;
import com.latihan.latihan173.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.LinkedHashMap;
import java.util.Map;
import java.util.Optional;

@RestController
@RequestMapping("/")
public class HomeController {

    @Autowired
    private UserRepository userRepo;

    @ResponseBody
    @RequestMapping("")
    public Map<String, Object> test(){
        Map<String, Object> map = new LinkedHashMap<>();
        map.put("result", "Hello");
        return map;
    }

    @RequestMapping(path = {"greetings", "hello"}, method = {RequestMethod.GET})
    public String greetings(){
        return "Hello world";
    }
    @RequestMapping(path = "member", method = RequestMethod.POST)
    public void addUser(@RequestBody UserApp user){
        userRepo.save(user);
    }
    @RequestMapping(path = "user", method = RequestMethod.POST)
    public ResponseEntity<UserApp> addMember(@RequestBody UserApp user){
        UserApp createdUser = userRepo.save(user);
        HttpHeaders headers = new HttpHeaders();
        headers.add("id", createdUser.getId().toString() );

        return new ResponseEntity<>(headers, HttpStatus.CREATED);
    }

    @RequestMapping(path = "user/{id}", method = RequestMethod.GET)
    public ResponseEntity<UserApp> get(@PathVariable("id") String id){
        Optional<UserApp> user= userRepo.findById(Long.valueOf(id));
        return new ResponseEntity<UserApp>(user.get(), HttpStatus.OK);
    }

    @RequestMapping(path = "user", method = RequestMethod.PUT)
    public ResponseEntity<UserApp>update(@RequestBody UserApp user){
        UserApp updateUser =  userRepo.save(user);
        return new ResponseEntity<UserApp>(updateUser, HttpStatus.OK);
    }

    @RequestMapping(path = "user/{id}", method = RequestMethod.DELETE)
    public ResponseEntity<Void> delete(@PathVariable("id") String id){
        userRepo.deleteById(Long.valueOf(id));
        return new ResponseEntity<>(HttpStatus.OK);
    }
}
